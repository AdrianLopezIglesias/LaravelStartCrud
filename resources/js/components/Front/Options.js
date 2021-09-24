import React, { Component } from 'react'
import Button from 'react-bootstrap/Button';
import OptionLogic from './OptionLogic'
import AnswerCheck from './AnswerCheck'

export default class Options extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    let buttonsLost =
      <div>
        <p>Game lost</p>
        <Button onClick={() => this.props.resetGame()}>Play again</Button>
      </div>

    let checkingAnswer =
      <AnswerCheck
        logic={this.props.logic}
        calculating={this.props.calculating}
        selectedOption={this.props.selectedOption}
        penalization_value={this.props.penalization_value}
      />

    let buttonsPlay =
      <OptionLogic 
        penalization_value={this.props.penalization_value}
        selectOption={this.props.selectOption}
        logic={this.props.logic}
      />

    let buttons
    switch (this.props.gameStatus) {
      case "play":
        buttons = buttonsPlay;
        break;
      case "calculating":
        buttons = checkingAnswer
        break;
      case "lost":
        buttons = buttonsLost;
        break;

      default:
        break;
    }


    return (
      <div>
        
        {buttons}
        <br />
        <Button onClick={() => this.props.resetGame()}>New game</Button>
      </div>
    )
  }
}
