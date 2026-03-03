<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\OauthAuth0\Dependency\External;

use League\OAuth2\Client\Token\AccessTokenInterface;

interface Auth0AdapterInterface
{
    public function getAccessToken(string $grantType, array $options = []): AccessTokenInterface;
}
