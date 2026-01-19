import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";
import { 
    getAuth, 
    GoogleAuthProvider, 
    signInWithPopup, 
    signInWithEmailLink, 
    sendSignInLinkToEmail, 
    isSignInWithEmailLink, 
    onAuthStateChanged, 
    signOut 
} from "https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js";

const firebaseConfig = {
    apiKey: "AIzaSyC9r70NiVuyDWOQAolicz-Ymy5qDnvctpQ",
    authDomain: "finanzia-auth.firebaseapp.com",
    projectId: "finanzia-auth",
    storageBucket: "finanzia-auth.firebasestorage.app",
    messagingSenderId: "908487902146",
    appId: "1:908487902146:web:f37c582725234ebc390c5b",
    measurementId: "G-JXPBCN9V06"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const googleProvider = new GoogleAuthProvider();

export { 
    auth, 
    googleProvider, 
    signInWithPopup, 
    sendSignInLinkToEmail, 
    signInWithEmailLink, 
    isSignInWithEmailLink, 
    onAuthStateChanged, 
    signOut 
};