export default class MyWorkletNode extends window.AudioWorkletNode {
    constructor(context) {
      super(context, 'my-worklet-processor');
    }
  }