<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\OauthAuth0\Auth0;

use Generated\Shared\Transfer\AccessTokenErrorTransfer;
use Generated\Shared\Transfer\AccessTokenRequestTransfer;
use Generated\Shared\Transfer\AccessTokenResponseTransfer;
use Spryker\Client\OauthAuth0\Dependency\External\Auth0AdapterInterface;
use Throwable;

class Auth0 implements Auth0Interface
{
    /**
     * @var \Spryker\Client\OauthAuth0\Dependency\External\Auth0AdapterInterface
     */
    protected $auth0Adapter;

    public function __construct(Auth0AdapterInterface $auth0Adapter)
    {
        $this->auth0Adapter = $auth0Adapter;
    }

    public function getAccessToken(AccessTokenRequestTransfer $accessTokenRequestTransfer): AccessTokenResponseTransfer
    {
        try {
            $options = $accessTokenRequestTransfer->getAccessTokenRequestOptions()
                ? $accessTokenRequestTransfer->getAccessTokenRequestOptions()->toArray()
                : [];

            $accessToken = $this->auth0Adapter->getAccessToken(
                $accessTokenRequestTransfer->getGrantTypeOrFail(),
                $options,
            );

            $accessTokenResponseTransfer = (new AccessTokenResponseTransfer())
                ->setAccessToken($accessToken->getToken())
                ->setExpiresAt((string)$accessToken->getExpires())
                ->setIsSuccessful(true);
        } catch (Throwable $e) {
            $accessTokenResponseTransfer = (new AccessTokenResponseTransfer())
                ->setIsSuccessful(false)
                ->setAccessTokenError(
                    (new AccessTokenErrorTransfer())->setError($e->getMessage()),
                );
        }

        return $accessTokenResponseTransfer;
    }
}
