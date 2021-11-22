<?php

session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
    <style>
      .customcontainer{
        width: 50%;
      }
      .chatbox{
        height:  500px;
        min-height: 500px;
        border:  1px solid #dfdede;
        padding: 10px;
      }
      .joinedmsg{
        background: #ededed;
        text-align: left;
        border-radius: 3px;
        color: #267e4e;
        padding: 5px 0px 5px 10px;
        font-size: 13px;
        font-weight: 700;
      }
      .usernameis{
        font-size: 14px;
        font-weight: 700;
        color: #333333;
        text-decoration: underline;
      }
      .usermessageis{
        background: #5187ff;
        color: #ffffff;
        padding: 5px 10px 5px 10px;
        font-size: 12px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        width: fit-content;
      }
    </style>


     <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
      <script>

        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('asdasdasdasdsadasd', {
          cluster: 'mt1'
        });

        var channel = pusher.subscribe('chatbox');
        channel.bind('my-event', function(data) {

          var chatjoinedmessage = '<div class="joinedmsg">'+data.username+' has joined the chat room.</div>';

          $('.chatbox').append(chatjoinedmessage);


        });



        var channel = pusher.subscribe('chatbox');
        channel.bind('sendmessage', function(data) {

          var chatjoinedmessage = '<div class="usernameis">'+data.name+'</div><div class="usermessageis">'+data.message+'</div>';

          $('.chatbox').append(chatjoinedmessage);


        });
      </script>


  </head>
  <body>
    

    <div class="container customcontainer">
        
        <input type="hidden" id="username" value="<?php echo $_SESSION['username']; ?>" />

        <div class="chatbox">

        </div>

        <form>
          
          <div class="mb-3">
            <input type="text" class="form-control" id="message" placeholder="Type your message here....">
          </div>

          <button class="btn btn-primary" type="button" onclick="sendmessage()">Send</button>

        </form>


    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <script>

      $(document).ready(function(){


        var username = $('#username').val();
        $.post('chat_handler.php', {action: 'userjoined', username: username}, function(response){

          console.log(response);

        });

      });


      function sendmessage(){

        var message = $('#message').val();
        console.log(message);

        var name = $('#username').val();

        $.post('chat_handler.php', {action: 'sendmessage', name: name, message: message}, function(response){

          console.log(response);

          $('#message').val('');

        });

      }

    </script>
  </body>
</html>