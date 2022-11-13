// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-analytics.js";
import * as firebaseAuth from "https://www.gstatic.com/firebasejs/9.9.2/firebase-auth.js";
const RUTE_AUTH = 'index.php';

const firebaseConfig = {
    apiKey: "AIzaSyAtz2f1Asu8dQi78TX6YojE6aPQAFEogfw",
    authDomain: "idrop-945e5.firebaseapp.com",
    projectId: "idrop-945e5",
    storageBucket: "idrop-945e5.appspot.com",
    messagingSenderId: "744608555383",
    appId: "1:744608555383:web:06f1e42a717e64c0f3c172"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = firebaseAuth.getAuth();
const provider = new firebaseAuth.GoogleAuthProvider();



//  SingIn
$('#submit-singin').on('click', function () {
    const email = $('#email').val();
    const password = $('#password').val();
    // Authenticate the User
    firebaseAuth.signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            console.log(userCredential);
            $.ajax({
                url: RUTE_AUTH,
                type: 'POST',
                data: {
                    firebase_email: email,
                    firebase_uid: userCredential.user.uid
                },
                success: function (response) {
                    window.location.href = "./pages/productos.php";
                }
            });
        })
        .catch((err) => {
            error('No tenes acceso');
        });
});


// Login with Google
const googleButton = document.querySelector("#googleLogin");

// Validate if session in redirect
firebaseAuth.getRedirectResult(auth)
    .then((responseFirebase) => {
        if (responseFirebase) {
            $.ajax({
                url: RUTE_AUTH,
                type: 'POST',
                data: {
                    firebase_email: responseFirebase.user.email,
                    firebase_uid: responseFirebase.user.uid
                },
                success: function (response) {
                    let res = JSON.parse(response);
                    if (res.ok) {
                        window.location.href = "./pages/productos.php";
                    } else {
                        if (res.message == 'Verification failed') {
                            error('No tenes acceso');
                        }
                        if (res.message == 'User not found') {
                            error('No tenes acceso');
                        }
                    }
                }
            });
        }
    })
    .catch((err) => {
        console.log(err);
    });

googleButton.addEventListener("click", async (e) => {
    e.preventDefault();
    firebaseAuth.signInWithRedirect(auth, provider);

});


