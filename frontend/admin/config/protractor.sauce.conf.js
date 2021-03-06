var SpecReporter = require('jasmine-spec-reporter').SpecReporter;

var buildNumber = 'travis-build#'+process.env.TRAVIS_BUILD_NUMBER;

exports.config = {
  sauceUser: process.env.SAUCE_USERNAME,
  sauceKey: process.env.SAUCE_ACCESS_KEY,
  allScriptsTimeout: 72000,
  getPageTimeout: 72000,
  specs: [
    '../dist/out-tsc-e2e/**/*.e2e-spec.js',
    '../dist/out-tsc-e2e/**/*.po.js'
  ],
  multiCapabilities: [
    {
      browserName: 'safari',
      platform: 'macOS 10.12',
      name: "safari-osx-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'chrome',
      platform: 'Linux',
      name: "chrome-linux-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'chrome',
      platform: 'macOS 10.12',
      name: "chrome-macos-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'chrome',
      platform: 'Windows 10',
      name: "chrome-latest-windows-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'firefox',
      platform: 'Linux',
      name: "firefox-linux-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'firefox',
      platform: 'macOS 10.12',
      name: "firefox-macos-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'firefox',
      platform: 'Windows 10',
      name: "firefox-latest-windows-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'internet explorer',
      platform: 'Windows 10',
      name: "ie-latest-windows-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'MicrosoftEdge',
      platform: 'Windows 10',
      name: "edge-latest-windows-tests",
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'safari',
      name: 'safari-ios-tests',
      platformName: 'iOS',
      platformVersion: '10.2',
      deviceName: 'iPhone 7',
      shardTestFiles: true,
      maxInstances: 5
    },
    {
      browserName: 'chrome',
      name: 'chrome-android-tests',
      platformName: 'Android',
      platformVersion: '6.0',
      deviceName: 'Android Emulator',
      shardTestFiles: true,
      maxInstances: 5
    }
  ],
  sauceBuild: buildNumber,
  directConnect: false,
  baseUrl: 'https://mlbors.github.io/symfony-angular/',
  framework: 'jasmine',
  jasmineNodeOpts: {
    showColors: true,
    defaultTimeoutInterval: 360000,
    print: function() {}
  },
  useAllAngular2AppRoots: true,
  beforeLaunch: function() {
    require('ts-node').register({
      project: 'e2e'
    });
  },
  onPrepare: function() {
    jasmine.getEnv().addReporter(new SpecReporter());
  }
};