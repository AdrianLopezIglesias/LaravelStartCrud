import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCoffee, faAddressCard, faAngry, faAtom, faBatteryHalf, faBiking, faBone, faBrain, faCar, faCarrot, faCat, faChurch, faChild } from '@fortawesome/free-solid-svg-icons'
const reactStringReplace = require('react-string-replace');

export function lettersToIcons(string) {
  string = reactStringReplace(string, 'Z', (match, i) => (< FontAwesomeIcon key={string} icon={faCoffee} />))
  string = reactStringReplace(string, 'B', (match, i) => (< FontAwesomeIcon key={string} icon={faAddressCard} />))
  string = reactStringReplace(string, 'C', (match, i) => (< FontAwesomeIcon key={string} icon={faChild} />))
  string = reactStringReplace(string, 'D', (match, i) => (< FontAwesomeIcon key={string} icon={faChurch} />))
  string = reactStringReplace(string, 'E', (match, i) => (< FontAwesomeIcon key={string} icon={faCat} />))
  string = reactStringReplace(string, 'Y', (match, i) => (< FontAwesomeIcon key={string} icon={faCarrot} />))
  string = reactStringReplace(string, 'G', (match, i) => (< FontAwesomeIcon key={string} icon={faBrain} />))
  string = reactStringReplace(string, 'H', (match, i) => (< FontAwesomeIcon key={string} icon={faBiking} />))
  string = reactStringReplace(string, 'X', (match, i) => (< FontAwesomeIcon key={string} icon={faAtom} />))
  string = reactStringReplace(string, 'J', (match, i) => (< FontAwesomeIcon key={string} icon={faBone} />))
  string = reactStringReplace(string, 'K', (match, i) => (< FontAwesomeIcon key={string} icon={faCar} />))
  return string;

}
