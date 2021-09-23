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

  let x = (_.random(1, 1500)) / 500 + 1
  let y = 2
  let z = (Math.pow(y, x)) / 2
  let zx = Math.round(z * 10) / 10

  return zx
}
export function mathGeneration() {
  function randomMultiplyer() {
    let y = Math.round(randomScalar()/2) / 10
    return y
  }



  let math
  let letras = "ZBCDEYGHXJ"
  function o0() {
    return chance.character({ pool: '+-' }) + " " + randomScalar()
  }
  function o1() {
    return chance.character({ pool: '+-' }) + " " + chance.character({ pool: letras }) + " " + "*" + randomMultiplyer()
  }
  function o2() {
    return chance.character({ pool: '+-' }) + " " + randomScalar()
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
  math = [s0(), s1(), s2(), s3()]
  math = _.shuffle(math);
  return math[0];


}
export function logicGenerator() {
  let data = _.times(Math.round(randomScalar()/2)+1, () => _.times(Math.round(randomScalar())+1, () => generateOption()));
  // let data = _.times(Math.round(randomScalar()), () => generateOption());

  return data;
}