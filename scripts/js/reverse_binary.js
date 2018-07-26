'use strict';

module.exports = {
  reverseBinary: n => {
    n = typeof n === 'string' ? parseInt(n) : n;
    return parseInt(n.toString(2).split('').reverse().join(''), 2) * (n < 0 ? -1 : 1);
  }
}
