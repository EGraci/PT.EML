<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bot/bot.css')}}">
</head>
<body>
    <section class="msger">
        <header class="msger-header">
          <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> Chat Bot
          </div>
          <div class="msger-header-options">
            <span><i class="fas fa-cog"></i></span>
          </div>
        </header>
      
        <main class="msger-chat">
          <div class="msg left-msg">
            <div class="msg-img" style="background-image: url(./images/bot.png)"></div>
      
            <div class="msg-bubble">
              <div class="msg-info">
                <div class="msg-info-name">BOT</div>
              </div>
      
              <div class="msg-text">
                Hi, welcome to SimpleChat! Go ahead and send me a message. 😄
              </div>
            </div>
          </div>
      
          
        </main>
      
        <div class="msger-inputarea">
          <input type="text" class="msger-input" placeholder="Enter your message...">
          <button type="submit" class="msger-send-btn">Send</button>
        </div>
      </section>

      <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
      <script src="{{asset('bot/bot.js')}}"></script>
</body>
</html>