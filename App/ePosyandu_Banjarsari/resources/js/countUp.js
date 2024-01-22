import { CountUp } from 'countup.js';

var countUp;

const options = {
    enableScrollSpy: true,
    duration: 3.5,
};

window.onload = function () {
    countUp = new CountUp("counter1", 124, options);
    countUp = new CountUp("counter2", 100, options);
    countUp = new CountUp("counter3", 70, options);
    countUp = new CountUp("counter4", 434, options);
    countUp.start();
};