<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Subscribe Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f0f0;
      text-align: center;
      padding-top: 100px;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    /* Popup background */
    .popup {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.3);
      justify-content: center;
      align-items: center;
    }

    /* Small popup box */
    .popup-content {
      background: #fff;
      padding: 20px 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      max-width: 300px;
      text-align: center;
    }

    .popup-content p {
      margin-bottom: 20px;
      font-size: 16px;
    }

    .popup-content button {
      margin: 0 10px;
    }
  </style>
</head>
<body>

  <h1>Subscribe to Our Newsletter</h1>
  <button onclick="showPopup()">Subscribe</button>

  <!-- Popup HTML -->
  <!-- resources/views/subscribe.blade.php -->
        @if(Auth::check())
        <div class="popup" id="popup">
            <div class="popup-content">
        <form method="POST" action="{{ route('subscribe.action') }}">
                @csrf
                <p>Do you want to subscribe?</p>
                <button type="submit" name="subscribe" value="yes">Yes</button>
                <button type="submit" name="subscribe" value="no">No</button>
            </form>
            </div>
        </div>
        @else
        <p>Please <a href="/login">login</a> to continue.</p>
        @endif


  <!-- JavaScript -->
  <script>
    function showPopup() {
      document.getElementById("popup").style.display = "flex";
    }

    function subscribeYes() {
      alert("Thanks for subscribing!");
      document.getElementById("popup").style.display = "none";
    }

    function subscribeNo() {
      alert("No problem. Maybe later!");
      document.getElementById("popup").style.display = "none";
    }
  </script>

</body>
</html>
