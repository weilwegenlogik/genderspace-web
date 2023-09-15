import './p5.js';
import './p5.sound.js';

let fft;
let mic;
let canvas;
let audioIsOn = false;
let micStream;

// voice.js
// voice.js
const audioContext = new AudioContext();

function initAudioWorklet() {
  //create a new AudioContext
  this.context = new AudioContext();

  //Add our Processor module to the AudioWorklet
  this.context.audioWorklet.addModule('worklet/processor.js').then(() => {

  //Create an oscillator and run it through the processor
  let oscillator = new OscillatorNode(this.context);
  let bypasser = new MyWorkletNode(this.context, 'my-worklet-processor');

  //Connect to the context's destination and start
  oscillator.connect(bypasser).connect(this.context.destination);
  oscillator.start();
  })
  .catch((e => console.log(e)))
}

// Call the function to initialize the audio worklet
initAudioWorklet();

  

function setup() {
    noLoop();
    canvas = createCanvas(400, 200).parent('frequencySpectrum');
}

function draw() {
    background(220);

    if (mic) {
        let spectrum = fft.analyze();
        for (let i = 0; i < spectrum.length; i++) {
            let x = map(i, 0, spectrum.length, 0, width);
            let h = -height + map(spectrum[i], 0, 255, height, 0);
            rect(x, height, width / spectrum.length, h);
        }
    }
}

function toggleAudio() {
    audioIsOn = !audioIsOn;

    if (micStream && micStream.getTracks().length > 0) {
        micStream.getTracks()[0].enabled = audioIsOn;

        if (audioIsOn) {
            loop();
        } else {
            noLoop();
        }
    }
}

document.getElementById('microphoneToggle').addEventListener('click', function() {
    if (!micStream) {
        // Request microphone access
        navigator.mediaDevices.getUserMedia({ audio: true }).then(function(stream) {
            micStream = stream;

            // Initialize microphone and audio context after user gesture
            mic = new p5.AudioIn();
            mic.start();

            fft = new p5.FFT();
            fft.setInput(mic);

            toggleAudio();
        }).catch(function(err) {
            console.error('Microphone access denied:', err);
        });
    } else {
        toggleAudio();
    }
});
