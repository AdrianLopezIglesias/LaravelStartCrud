<template>
<div>
  <div class="container-fluid">
    <div>
      <br>
      <h2>Space travel</h2>
      <br>
    </div>
    <div class="row">
      <div class="col-md-6">

        <div class="card" :key="gameState">
          <div class="card-header text-center">
            <h4>Instructions from earth</h4>
          </div>
          <div class="card-body" :key="shipLocation[3]">
            <div style="min-height: 580px">
              <div v-if="gameState!='loadingMovements'">
                <div style="min-height: 500px">
                  <movement v-for="(movement,index) in movements" v-bind:key="index" v-bind:index="index" v-bind:movement="movement" :current_action="current_action">
                  </movement>
                </div>
                <div class="row">

                  <div class="col-6">
                    <button class="w-100 btn btn-outline-warning" :disabled="userMustWait()" v-on:click="getMovements">
                      <h5>Call for new instructions</h5>
                    </button>

                  </div>
                  <div class="col-6">
                    <button class="w-100 btn btn-outline-success" :disabled="userMustWait()" v-on:click="followInstructions">
                      <h5>Go with current instructions</h5>
                    </button>

                  </div>
                </div>
              </div>
            </div>

            <div v-if="gameState=='loadingMovements'">
              <img class="w-100" src="/load.gif">
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-6">

        <div class="card">
          <div class="card-header  text-center">
            <h4>Our location</h4>
          </div>
          <div class="card-body">
            <div style="min-height: 580px">
              <div class="row" :key="shipLocation[3]" :id="shipLocation[3]">
                <space v-for="(slots,index) in map" v-bind:key="index" v-bind:meteors="meteors" v-bind:goal="goal" v-bind:slots="slots" v-bind:shipLocation="shipLocation">
                </space>
								</div>
                <div v-if="this.gameState == 'loadingActions'">
                  <p class="m-4">Loading Actions from server ...</p>
                </div>
                <div v-if="this.gameState != 'loadingActions'">
                  <p class="m-4">Current action: {{shipLocation[2]}}</p>
                </div>
                <div v-if="this.gameState == 'lost'">
                  <h4>Game Lost</h4>
                  <button class="w-100 btn btn-outline-danger" v-on:click="playAgain">
                    <h5> Play Again</h5>
                  </button>
                </div>
                <div v-if="this.gameState == 'won'">
                  <h1>You won!!!!</h1>
                  <button class="w-100 btn btn-outline-success" v-on:click="playAgain">
                    <h5> Play Again</h5>
                  </button>
                </div>
              </div>
          </div>
        </div>

      </div>
    </div>
    <br>
		    <div class="card">
      <div class="card-header">
        <h4>Game settings</h4>
      </div>
      <div class="card-body">
        <table>
          <tr>
            <td>Game speed: Used for calculating each movement of the ship. Issued in miliseconds (more = slower)</td>
            <td><input v-model="game_speed" placeholder="game_speed"></td>
          </tr>
          <tr>
            <td style="with: 30%">Async delay: Used for calculating the response callback from the server. Issued in miliseconds (more = slower)</td>
            <td><input v-model="async_delay" placeholder="async_delay"></td>
          </tr>
        </table>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header">
        <h4>Game Instructions</h4>
      </div>
      <div class="card-body">
        <p>Issue orders to the Ship by clicking "Go with current instructions" button.</p>
        <p>The spaceship will move to the relative directions as long as it doesn't exit the map.</p>
        <p>If the spaceship crashes into a meteor you lose the game.</p>
        <p>You may ask for new instructions from earth by clicking "Call for new instructions" button.</p>
      </div>
    </div>

    <p></p>

  </div>

</div>
</template>

<script>
var movement = Vue.component('movement', {
  props: ['movement', 'current_action', 'index'],
  template: '<h5 :class="slotStyle">{{movement}}</h5>',
  data() {
    return {
      slotStyle: 'alert alert-primary text-center'
    }
  },
  mounted() {

    if (this.current_action === this.index) {
      this.slotStyle = 'alert alert-warning text-center';
    } else {
      this.slotStyle = 'alert alert-success text-center';
    }
  },
})

var space = Vue.component('space', {
  data() {
    return {
      slotStyle: 'space-empty',
      spaceShip: ''
    }
  },
  props: ['index', 'slots', 'shipLocation', 'meteors', 'goal'],

  mounted() {
    if (this.shipLocation[0] == this.slots[0] && this.shipLocation[1] == this.slots[1]) {
      this.slotStyle = 'space-ship';
      this.spaceShip = '<i class="fas fa-rocket"></i>'
    } else {
      this.slotStyle = 'space-empty'
      this.spaceShip = ''
    }
    this.meteors.forEach(x => {
      if (x[0] == this.slots[0] && x[1] == this.slots[1]) {
        this.slotStyle = 'space-meteor';
        this.spaceShip = '<i class="fas fa-meteor"></i>'
      }
    })
    if (this.goal[0] == this.slots[0] && this.goal[1] == this.slots[1]) {
      this.slotStyle = 'space-earth';
      this.spaceShip = '<i class="fas fa-globe-americas"></i>'
    }
  },

  template: `<div :class="slotStyle"> <div class=" text-center w-100  p-2" style="color: white;" > <div v-html="spaceShip"></div></div></div>`
})

import {
  mapActions,
  mapGetters
} from 'vuex';
import {
  getMovements,
  followOrders
} from '../services/MovementService.js';
import {
  library
} from '@fortawesome/fontawesome-svg-core'
import {
  faUserSecret
} from '@fortawesome/free-solid-svg-icons'
import {
  FontAwesomeIcon
} from '@fortawesome/vue-fontawesome'

const timer = ms => new Promise(res => setTimeout(res, ms))

export default {
  data() {
    return {
      movements: [],
      map: [
        [0, 0],
        [0, 1],
        [0, 2],
        [1, 0],
        [1, 1],
        [1, 2],
        [2, 0],
        [2, 1],
        [2, 2]
      ],
      shipLocation: [0, 0, 'Awaiting orders', 'id'],
      gameState: "playing",
      current_action: ' ',
      game_speed: 1000,
      async_delay: 10,
      meteors: [],
      goal: [4, 4],
      game_dificulty: 5
    }
  },

  mounted() {
    this.generateMap();
    setTimeout(() => {
      this.getMovements();
    }, this.async_delay);

    function random_cordinates() {
      return Math.floor(Math.random() * 10)
    }
    for (let i = 0; i <= this.game_dificulty; i++) {
      let new_cordinate = [random_cordinates(), random_cordinates()];
      if (new_cordinate[0] != this.shipLocation[0] &&
        new_cordinate[1] != this.shipLocation[1] &&
        new_cordinate[0] != this.goal[0] &&
        new_cordinate[1] != this.goal[1]

      ) {
        this.meteors.push(new_cordinate)
      } else {
        i--

      }
    }
    console.log(this.meteors)
  },

  methods: {
    userMustWait() {
      return this.gameState != 'playing';

    },
    generateMap() {
      this.map = [];
      for (let i = 0; i < 10; i++) {
        for (let h = 0; h < 10; h++) {
          this.map.push([i, h])
        }
      }
    },
    playAgain() {
      this.generateMap();
      this.getMovements();
      this.shipLocation = [0, 0, 'Awaiting orders', 'id']
    },

    async getMovements() {
      console.log("getting movements")
      this.gameState = "loadingMovements";

      setTimeout(async () => {
        getMovements().then(r => {
          this.movements = r.data
          this.gameState = "playing";
        })
      }, this.async_delay);

    },

    checkWinLost() {
      this.meteors.forEach(x => {
        if (x[0] == this.shipLocation[0] && x[1] == this.shipLocation[1]) {
          this.gameState = "lost"
        }
      })

      if (this.goal[0] == this.shipLocation[0] && this.goal[1] == this.shipLocation[1]) {
        this.gameState = "won"
      }
    },

    async followInstructions() {

      this.gameState = "loadingActions";

      setTimeout(async () => {
        let actions = {
          itmes: this.movements,
          initial: this.shipLocation,
        }

        this.current_action = " ";

        followOrders(actions).then(r => {
          console.log(this.current_action)
          this.current_action = " ";

          this.actions = r.data

          this.gameState = "moving";
          let i = 0;

          this.actions.forEach(async (a, index) => {
            setTimeout(() => {
              if (this.gameState != "lost" && this.gameState != "won") {

                this.current_action = index - 1;
                this.shipLocation = a;
                this.current_action = index - 1;
                this.checkWinLost();
              }
            }, index * this.game_speed);
          })

          setTimeout(() => {
            if (this.gameState != "lost" && this.gameState != "won") {
              this.getMovements();
              this.gameState = "playing";
              this.current_action = ' ';
              this.shipLocation[2] = "Awaiting orders";
              this.shipLocation[3] = "Finished";
            }

          }, this.actions.length * this.game_speed);

        })
      }, this.async_delay);
    }
  }
}
</script>
