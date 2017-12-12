import React,{Component} from 'react';

import EmailEditor from 'react-email-editor'
let htmlEditor = {};

class Test extends Component {
  
  constructor(props) {
  	super(props)
  	this.state = {
  		editor: {}
  	}
  	this.exportHtml = this.exportHtml.bind(this);
  	this.view = this.view.bind(this);
  }
  render() {
  	
    return (<div>

      <div>
        <button onClick={this.exportHtml}>Export HTML</button>
      </div>

      <EmailEditor
        ref={ editor => htmlEditor = editor }
        view={this.state.editor}
      />
    </div>)
  }

  exportHtml() {
  	console.log(htmlEditor)
  	htmlEditor.saveDesign(design => {
  		this.setState({
  			editor: design
  		})
      // const { design, html } = data
      console.log('exportHtml', design)
    })
  }
  view() {
  	if(editor) {
  		this.state.editor = editor
  	}
  	
  }
}


export default Test;