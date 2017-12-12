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
    this.fetchData = this.fetchData.bind(this);
  }
  render() {
  	
    return (<div>

      <div>
        <button onClick={this.exportHtml}>Save Template</button>
      </div>

      <EmailEditor
        minHeight="700px"
        ref={ editor => htmlEditor = editor }
        view={this.state.editor}
      />
    </div>)
  }

  fetchData() {
    let data = {
      action: 'ninja_email_get_email'
    }

    jQuery
        .get(ajaxurl, data) 
        .then((res) => {
          console.log(res)
        })
        .catch((err) => {
          console.log(err)
        })
  }

  exportHtml() {
  	console.log(htmlEditor)
  	htmlEditor.exportHtml( (r) => {

      const { design, html } = r;

      console.log(html)

  		this.setState({
  			editor: design
  		})

      let data = {
        action: 'ninja_email_editor_update',
        tem_email_tile: 'hello',
        tem_email_tempate: html
      }

      jQuery
            .post(ajaxurl, data)
            .then((res) => {
              console.log(res)
            })
            .fail((err) => {
              console.log(err)
            })
      // const { design, html } = data
      console.log('exportHtml', design)
    })

    this.fetchData()
  }
  view() {
  	if(editor) {
  		this.state.editor = editor
  	}
  	
  }
}


export default Test;