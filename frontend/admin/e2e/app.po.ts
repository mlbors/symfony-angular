/**
 * Symfony Angular - Page Object - App
 *
 * @since		  11.05.2017
 * @version   1.0.0.0
 * @author		mlbors
 * @copyright	-
 */

/*****************************/
/********** IMPORTS **********/
/*****************************/

import { browser, by, element } from 'protractor';

/********************************************************************************/
/********************************************************************************/

/***************************/
/********** CLASS **********/
/***************************/

export class AppPage {

  /*********************************/
  /********** NAVIGATE TO **********/
  /*********************************/

  navigateTo() {
    browser.ignoreSynchronization = true;
    return browser.get(browser.baseUrl);
  }

  /********************************************************************************/
  /********************************************************************************/

  /*************************************/
  /********** GET BROWSER URL **********/
  /*************************************/

  getBrowserUrl() {
    return browser.baseUrl;
  }

  /********************************************************************************/
  /********************************************************************************/

  /*************************************/
  /********** GET CURRENT URL **********/
  /*************************************/

  getCurrentUrl() {
    return browser.getCurrentUrl();
  }

  /********************************************************************************/
  /********************************************************************************/

  /****************************************/
  /********** GET PARAGRAPH TEXT **********/
  /****************************************/

  getParagraphText() {
    return element(by.css('app-root h1')).getText();
  }
}
