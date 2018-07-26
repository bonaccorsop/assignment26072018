'use strict';

const { reverseBinary } = require('../reverse_binary.js');

test('should convert integer in binary, revert and return its decimal value', () => {
  expect(reverseBinary(13)).toBe(11);
  expect(reverseBinary(11)).toBe(13);
});

test('should convert a negative integer in binary, revert and return its decimal value', () => {
  expect(reverseBinary(-13)).toBe(-11);
});

test('should accept a string, convert the integer value in binary, revert and return its decimal value', () => {
  expect(reverseBinary('13')).toBe(11);
});