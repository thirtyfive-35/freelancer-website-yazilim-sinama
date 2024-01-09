<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\AndroidPublisher;

class BatchUpdateSubscriptionOffersRequest extends \Google\Collection
{
  protected $collection_key = 'requests';
  /**
   * @var UpdateSubscriptionOfferRequest[]
   */
  public $requests;
  protected $requestsType = UpdateSubscriptionOfferRequest::class;
  protected $requestsDataType = 'array';

  /**
   * @param UpdateSubscriptionOfferRequest[]
   */
  public function setRequests($requests)
  {
    $this->requests = $requests;
  }
  /**
   * @return UpdateSubscriptionOfferRequest[]
   */
  public function getRequests()
  {
    return $this->requests;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchUpdateSubscriptionOffersRequest::class, 'Google_Service_AndroidPublisher_BatchUpdateSubscriptionOffersRequest');
