import React, { Component } from "react";
import { create, all } from 'mathjs'
import GameState from './GameState';
import { logicGenerator } from "./Helpers/logic";
import Options from './Options'
import Container from 'react-bootstrap/Container'


const config = {}
const math = create(all, config)
var _ = require('lodash');
const timer = ms => new Promise(res => setTimeout(res, ms))

class Game extends Component {
  constructor(props) {
    super(props);
    this.state = {
      logic: [],
      core: this.initialVals,
      last: this.initialVals,
      gameStatus: 'play',
      survived: 0,
      calculating: [0, "Z", ],
      selectedOption: 0,
      history: [],
    }

  }
  initialVals = { Z: 10, B: 10, C: 10, D: 10, E: 10, Y: 10, G: 10, H: 10, X: 10, J: 10, M:10, L:10 }

  componentDidMount() {
    let savedState
    if (JSON.parse(localStorage.getItem('game'))) {
      savedState = JSON.parse(localStorage.getItem('game'))
    } else {
      this.saveState()
    }
    this.setState({
      logic: logicGenerator()
    })
    if (savedState) {
    this.setState(savedState)
    }



  }

  saveState() {
    localStorage.setItem('game', JSON.stringify(this.state))
  }

  resetGame = () => {
    this.setState({
      logic: logicGenerator(),
      core: this.initialVals,
      gameStatus: 'play',
      survived: 0,
      calculating: [0, 0],
      selectedOption: 0
    })
    this.saveState()

  }

  async resolveOption(t) {

    this.setState({ gameStatus: 'calculating', selectedOption: t })

    let vals = {};
    let vols = this.state.last;
    _.forIn(this.state.core, function (value, key) {
      vals[key] = value;
    });

    for (var i = 0; i < this.state.logic[t].length; i++) {
      if (this.state.gameStatus != "lost") {
        let ob = this.state.logic[t][i].math.objective;
        let x = math.parse(this.state.logic[t][i].math.operation)
        let y = x.compile()
        let z = x.evaluate(vals)
        this.setState({ calculating: [i, z, ob, x] })

        let n = 0
        if (vols[ob]) {
          n = (vols[ob])
        }
        vals[ob] = vals[ob] + z
        vols[ob] = + z
        this.setState({
          core: vals,
          last: vols,
        })

        await timer(1500); // 
      }
      this.checkLost(vals)
    }
    await this.penalization();
    this.checkLost(vals)
    if (this.state.gameStatus != "lost") {
      this.setState({
        survived: this.state.survived + 1,
        gameStatus: 'play',
        calculating: [0, 0, 0, 0],
        selectedOption: 0
      })
    }
    this.saveState()



  }

  checkLost = (vals) => {
    let history = this.state.history; 
    let lost;
    _.forIn(vals, function (value, key) {
      if (value < 0) {
        lost = true;
      }
    })

    if (lost) {
      history.push(this.state.survived)
      this.setState({
        gameStatus: 'lost',
        history: history
      })
      this.saveState()
    }
  }

  penalization_value = () => {
    return Math.round((this.state.survived / 7 + 0.5) * 10)/10
  }

  async penalization() {
    let penalization_value = this.penalization_value();
    let vals = {};
    let vols = {};

    _.forIn(this.state.core, function (value, key) {
      vals[key] = value - penalization_value;
      vols[key] = -penalization_value;
    });
    this.setState({
      core: vals,
      last: vols,
      calculating: [99, "Todo -" + penalization_value]
    })
    this.checkLost(vals)
    await timer(1500); // 

    }

  selectOption = async (x) => {
    await this.resolveOption(x);
    this.setState({
      logic: logicGenerator()
    })
  }

  ignoreOption = () => {
    this.penalization();
    this.setState({
      logic: logicGenerator()
    })
  }

  render() {
    let c = this.state.core;
    let l = this.state.last;

    return (
      <Container className="pt-4">
        <h2>Turnos: {this.state.survived} / {Math.max.apply(Math, this.state.history)}</h2>
        <GameState
          status={c}
          last={l}
          calculating={this.state.calculating}
          logic={this.state.logic}
          selectedOption={this.state.selectedOption}
        
        />
        <Options
          logic={this.state.logic}
          gameStatus={this.state.gameStatus}
          calculating={this.state.calculating}
          penalization_value={this.penalization_value}
          selectOption={this.selectOption}
          resetGame={this.resetGame}
          selectedOption={this.state.selectedOption}
          ignoreOption={this.ignoreOption} />
      </Container>
    );
  }

}

export default Game;