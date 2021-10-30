import Chance from 'chance';
const chance = new Chance();
var _ = require('lodash');

export function generateOption() {
  let o = {
    // word: chance.word(),
    math: mathGeneration()
  }
  return o;
}
function randomScalar() {
  let x = (_.random(1, 1500)) / 900 + 1
  let y = 2
  let z = (Math.pow(y, x)) / 2
  let zx = Math.round(z * 10) / 10
  return zx
}



export function mathGeneration() {
  let math
  function randomMultiplyer() {
    let y = Math.round(randomScalar()) / 10
    return y
  }
  let letras = "ZBCDEYGHXJML"
  function o0() {
    return chance.character({ pool: '+-' }) + " " + randomScalar()
  }
  function o1() {
    return chance.character({ pool: '+-' }) + " " + chance.character({ pool: letras }) + " " + "*" + randomMultiplyer()
  }
  function o2() {
    return chance.character({ pool: '+-' }) + " " + randomScalar()
  }
  function o3() {
  
  }
  function s0() {
    return {
      objective: chance.character({ pool: letras }),
      operation: o0(),
    }
  }
  function s1() {
    return {
      objective: chance.character({ pool: letras }),
      operation: o1(),
    }
  }
  function s2() {
    return {
      objective: chance.character({ pool: letras }),
      operation: chance.character({ pool: '+-' }) + " (" + o0() + " " + o1() + " )"
    }

  }
  function s3() {
    return {
      objective: chance.character({ pool: letras }),
      operation: chance.character({ pool: '+-' }) + " " + chance.character({ pool: letras }) + " " + "*" + randomMultiplyer()
    }
  }
  function s4() {
    return {
      objective: chance.character({ pool: letras }),
      operation: chance.character({ pool: '+-' }) + " " + chance.character({ pool: letras }) + " / " + chance.character({ pool: letras })
    }
  }

  math = [s0(), s1(), s2(), s3(), s4()]
  math = _.shuffle(math);
  return math[0];


}
export function logicGenerator() {
  let data = _.times(Math.round(randomScalar()*2)+6, () => _.times(Math.round(randomScalar()*2)+6, () => generateOption()));
  // let data = _.times(Math.round(randomScalar()), () => generateOption());

  return data;
}