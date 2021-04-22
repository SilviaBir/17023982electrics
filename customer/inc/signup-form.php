<?php
  // the react.js form for user registration

  //database connection
  require "../includes/dbconnect.php"
?>
<div class="card-body">
  <!--Header-->
  <div class="text-center">
    <h3 class="white-text">Register:</h3>
    <hr class="hr-light">
  </div>

  <!-- React.js initiation -->
  <div id="root"></div>
  <script type="text/babel">

  class NameForm extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        value: ''

      };

      this.handleChange = this.handleChange.bind(this);
  	  this.handleChange2 = this.handleChange2.bind(this);
      this.handleChange3 = this.handleChange3.bind(this);
      this.handleChange4 = this.handleChange4.bind(this);
      this.handleSubmit = this.handleSubmit.bind(this);
    }

    //Name validation
    handleChange(event) {
  	  this.setState({value: event.target.value});
  	  //this.setState({value: event.target.value.toLowerCase()});
  		var name = this.state.value;
      if (name !== "undefined") {
        if (!name.match(/^[a-zA-Z ]*$/)) {
          alert ("*Please enter alphabet characters only.");
        }
      }
    }

    //phone number validation
    handleChange2(event) {
  	  this.setState({value2: event.target.value});
  		var phone = this.state.value2;
  		//live validation of the special characters
  		for (var i = 0; i < phone.length; i++) {
        if(phone.match(/^[0-9]{11}$/)!= -1) {
          alert("Insert a phone number of 11 digits long. \n You inserted " + phone.length + "digits");
        }
      }
    }


    //email validation
    handleChange3(event) {
      this.setState({value3: event.target.value});
      var email = this.state.value3;
      //user validation of the special characters
      //var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
      var email = this.state.value;
      if (name !== "undefined") {
        if (!name.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
          alert("Email is: " + this.state.value3);
        }
      }
    }


    handleChange4(event) {
      this.setState({value4: event.target.value});
      var password = this.state.value4;
      //user validation of the special characters
      //Solution from: https://stackoverflow.com/questions/14850553/javascript-regex-for-password-containing-at-least-8-characters-1-number-1-uppe
      //Contain at least 8 characters, 1 number, 1 lowercase character (a-z), 1 uppercase character (A-Z)
      //contains only 0-9a-zA-Z
      for (var i = 0; i < password.length; i++) {
        if(!password.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8})$/)) {
          alert("Your password has to be 8 characters long, formed by at least 1 number, 1 letter lowercase and 1 uppercase. ");
        }
      }

    }

  //without .preventDefault() the submitted form would be refreshed
    handleSubmit(event) {
      //event.preventDefault();
      alert('You submitted the following \n Name: ' +this.state.value +'\n Phone: ' +this.state.value2 + '\n Email: ' + this.state.value3);
    }


    render() {
      return (
        <form onSubmit={this.handleSubmit} action="inc/signup.incl.php" method="post" name="SignupForm" >
          <div class="md-form1">
            <label>Name:</label>
              <input type="text" name= "name" value={this.state.value} onChange={this.handleChange} class="form-control"/><br />
          </div>
          <div class="md-form1">
          <label>Phone:</label>
            <input type="number" name= "phone" value={this.state.value2} onChange={this.handleChange2} class="form-control"/><br />
          </div>
          <div class="md-form1">
            <label>Email:</label>
              <input type="email" name= "email" value={this.state.value3} onChange={this.handleChange3} class="form-control"/><br />
          </div>
          <div class="md-form1">
            <label>Password:</label>
              <input type="password" name= "password" value={this.state.value4} onChange={this.handleChange4} class="form-control"/><br />
          </div>
          <div class="text-center mt-4">
            <button class="btn btn-info" type="submit" name="submit-signup" value="submit" onClick={this.handleSubmit}>Sign up</button>
          </div>
        </form>
      );
    }
  }

  ReactDOM.render(
    <NameForm />,
    document.getElementById('root')
  );


  </script>
</div>
