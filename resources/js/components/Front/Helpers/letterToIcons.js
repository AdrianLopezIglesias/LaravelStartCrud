import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faMoneyBillAlt, faLandmark, faGem, faFighterJet, faCloudSun, faSpa, faAddressCard, faFire, faAtom, faBatteryHalf, faBiking, faBone, faBrain, faCar, faCarrot, faCat, faChurch, faChild } from '@fortawesome/free-solid-svg-icons'
const reactStringReplace = require('react-string-replace');

export function lettersToIcons(string) {
  string = reactStringReplace(string, 'Z', (match, i) => (< FontAwesomeIcon key={string} icon={faSpa} />))
  string = reactStringReplace(string, 'B', (match, i) => (< FontAwesomeIcon key={string} icon={faCloudSun} />))
  string = reactStringReplace(string, 'C', (match, i) => (< FontAwesomeIcon key={string} icon={faChild} />))
  string = reactStringReplace(string, 'D', (match, i) => (< FontAwesomeIcon key={string} icon={faBiking} />))
  string = reactStringReplace(string, 'E', (match, i) => (< FontAwesomeIcon key={string} icon={faFire} />))
  string = reactStringReplace(string, 'Y', (match, i) => (< FontAwesomeIcon key={string} icon={faGem} />))
  string = reactStringReplace(string, 'G', (match, i) => (< FontAwesomeIcon key={string} icon={faBrain} />))
  string = reactStringReplace(string, 'H', (match, i) => (< FontAwesomeIcon key={string} icon={faFighterJet} />))
  string = reactStringReplace(string, 'X', (match, i) => (< FontAwesomeIcon key={string} icon={faAddressCard} />))
  string = reactStringReplace(string, 'J', (match, i) => (< FontAwesomeIcon key={string} icon={faMoneyBillAlt} />))
  string = reactStringReplace(string, 'M', (match, i) => (< FontAwesomeIcon key={string} icon={faLandmark} />))
  string = reactStringReplace(string, 'L', (match, i) => (< FontAwesomeIcon key={string} icon={faChurch} />))
  return string;

}
