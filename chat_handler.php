<?php
  require __DIR__ . '/vendor/autoload.php';


  if( $_POST['action']=='userjoined' ){
    $options = array(
      'cluster' => 'mt1',
      'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
      '7c882996a0e140433efd',
      '442fc00c2509d31373bb',
      '1301686',
      $options
    );

    $data['username'] = $_POST['username'];

    $pusher->trigger('chatbox', 'my-event', $data);
  }else


  if( $_POST['action']=='sendmessage' ){

     $options = array(
      'cluster' => 'mt1',
      'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
      '21321321312312312322',
      '12312312312312321312',
      '2222222',
      $options
    );

    $data['name'] = $_POST['name'];
    $data['message'] = $_POST['message'];

    $pusher->trigger('chatbox', 'sendmessage', $data);
    echo 1;

  }

  
?>