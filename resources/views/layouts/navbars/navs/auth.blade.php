<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      @if(Auth::user()->hasRole('admin'))
        <form class="navbar-form" method="GET" action="{{ route('manager_search_sv') }}">
          <div class="input-group no-border">
            <input type="text" name="search-sv" value="" class="form-control" placeholder="Search...">
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
              <i class="material-icons">search</i>
              <div class="ripple-container"></div>
            </button>
          </div>
        </form>
      @else
        <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Nhận thông báo</button>
      @endif
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a href="{{route('user.profile.index')}}" class="dropdown-item">{{ Auth::user()->name }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- Nofication Firebase -->
<!-- <script src='https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js'></script>
<script src='https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js'></script> -->
<script type="text/javascript">
    var firebaseConfig = {
        apiKey: "AIzaSyAGPqYuvoom0xuXuGsPDDkvUjo6dy2divk",
        authDomain: "management-779ec.firebaseapp.com",
        projectId: "management-779ec",
        storageBucket: "management-779ec.appspot.com",
        messagingSenderId: "479176157552",
        appId: "1:479176157552:web:26c642a398c673788907b5",
        measurementId: "G-QJRPBX9YHP"
    };
    // measurementId: G-R1KQTR3JBN
      // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
      messaging
      .requestPermission()
      .then(function () {
          return messaging.getToken()
      })
      .then(function(token) {
          console.log(token);

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              url: '{{ route("save-token") }}',
              type: 'POST',
              data: {
                  id: {{Auth::user()->id}},
                  token: token
              },
              dataType: 'JSON',
              success: function (response) {
                  alert('Token saved successfully.');
              },
              error: function (err) {
                  console.log('User Chat Token Error'+ err);
              },
          });

      }).catch(function (err) {
          toastr.error('User Chat Token Error'+ err, null, {timeOut: 3000, positionClass: "toast-bottom-right"});
      });
    }  

      messaging.onMessage(function(payload) {
          // const noteTitle = payload.notification.title;
          const noteOptions = {
              body: payload.notification.body,
              icon: payload.notification.icon,
          };
          const options = payload.time_to_live;
          if (Notification.permission === "granted") {
              var notification = new Notification(payload.notification.title, noteOptions, options);
              notification.onclick = function(ev) {
                  ev.preventDefault();
                  window.open(payload.notification.click_action,'_blank');
                  notification.close();
              }

          }
      });
</script>

<!-- End Nofication Firebase -->
