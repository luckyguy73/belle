@extends('layouts.app')

@section('content')
  <div class="col-sm-8 col-sm-offset-2 panel panel-default">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">Ask a question</li>
    </ol>
    <div id="watch-example" class="panel-body text-center">
      <div class="form-group">
        <button class="btn btn-default" v-show="again" @click="clear">Ask Again</button>
      </div>
      <p>Ask a yes/no question:
        <input v-model="question">
      </p>
      <h2>@{{ answer }}</h2>
      <img :src="imagePath">
      
    </div>
  </div>
@stop

@section('scripts')
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
    <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
    <script>
      var watchExampleVM = new Vue({
        el: '#watch-example',
        data: {
          question: '',
          answer: 'I cannot give you an answer until you ask a question! 😕',
          imagePath: '',
          again: false
        },
        watch: {
          // whenever question changes, this function will run
          question: function (newQuestion) {
            this.answer = 'Waiting for you to stop typing... 😐'
            this.getAnswer()
          }
        },
        methods: {
          clear: function() {
            this.question = ''
            this.imagePath = ''
            this.again = false
          },
          // _.debounce is a function provided by lodash to limit how
          // often a particularly expensive operation can be run.
          // In this case, we want to limit how often we access
          // yesno.wtf/api, waiting until the user has completely
          // finished typing before making the ajax request. To learn
          // more about the _.debounce function (and its cousin
          // _.throttle), visit: https://lodash.com/docs#debounce
          getAnswer: _.debounce(
            function () {
              if (this.question.indexOf('?') === -1) {
                this.answer = 'Questions usually contain a question mark. 😉'
                return
              }
              this.answer = 'Thinking... 🤔'
              var vm = this
              axios.get('https://yesno.wtf/api')
                .then(function (response) {
                  vm.answer = _.capitalize(response.data.answer)
                  vm.imagePath = response.data.image
                  vm.again = true
                })
                .catch(function (error) {
                  vm.answer = 'Error! Could not reach the API. ' + error
                })
            },
            // This is the number of milliseconds we wait for the
            // user to stop typing.
            500
          )
        }
      })
    </script>
@stop