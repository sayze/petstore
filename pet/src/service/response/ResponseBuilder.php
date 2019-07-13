<?php

namespace App\Service\Response;

/**
 * This class allows the standardization of JSON responses
 * all throughout the application. By doing so a client can
 * always depend on the response format being consistent.
 * Every response must contain
 * Status: Described by static variables below
 * Message: Provide useful message to the caller (Such as errors)
 * Data: Hold any dynamic data (such as result of db query
 * Class ResponseBuilder
 *
 * @package App\Service\Response
 */
class ResponseBuilder {

  /**
   * @var string different response statuses available.
   */
  const
    STATUS_OK = 'OK',
    STATUS_ERROR = 'ERROR',
    STATUS_FATAL = 'FATAL',
    STATUS_INVALID = 'INVALID',

    // Response codes.
    CODE_OK = 200,
    CODE_NO_CONTENT = 204,
    CODE_BAD_REQUEST = 400,
    CODE_UNAUTHORISED = 401,
    CODE_FORBIDDEN = 403,
    CODE_NOT_FOUND = 404,
    CODE_INVALID_METHOD = 405,
    CODE_FATAL = 500;


  /**
   * @var mixed $data The main body of the response
   * @var string $message Store and return helpful user messages
   * @var string $status Response status as defined above
   */
  private $data, $message, $status;

  public function __construct($data = [], $message = '', $status = 'OK') {
    $this->data = $data;
    $this->message = $message;
    $this->status = $status;
  }

  /**
   * Get the response message.
   *
   * @return String
   */
  public function getMessage() {
    return $this->message;
  }

  /**
   * Get the data for response.
   *
   * @return array
   */
  public function getData() {
    return $this->data;
  }

  /**
   * Set the data key inside inside response.
   * This is useful if needing to completely reset the data key to another type.
   *
   * @param array $data
   *
   * @return ResponseBuilder
   */
  public function setData($data) {
    $this->data = $data;
    return $this;
  }

  /**
   * Set the response message.
   *
   * @param String $message
   *
   * @return ResponseBuilder
   */
  public function setMessage(String $message) {
    $this->message = $message;
    return $this;
  }

  /**
   * Update the status key of the response.
   * Caller can use static STATUS functions defined above.
   *
   * @param String $status
   *
   * @return ResponseBuilder
   */
  public function setStatus(String $status) {
    $this->status = $status;
    return $this;
  }

  /**
   * Append values to the data array.
   * This is useful for creating dynamic response value for data key.
   *
   * @param $data
   *
   * @return ResponseBuilder
   */
  public function pushData($data) {
    $this->data[] = $data;
    return $this;
  }

  /**
   * Returns the final response in array format. If any of the optional
   * parameters are populated then they will be used instead of the current
   * instance values.
   *
   * @param $data
   * @param $message
   * @param  $status
   *
   * @return array
   */
  public function build($message = NULL, $data = [], $status = NULL) {
    return [
      'status' => $status ? $status : $this->status,
      'message' => $message ? $message : $this->message,
      'data' => !empty($data) ? $data : $this->data
    ];
  }
}
