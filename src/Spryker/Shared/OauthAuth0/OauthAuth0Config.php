<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\OauthAuth0;

use Spryker\Shared\Kernel\AbstractBundleConfig;

class OauthAuth0Config extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @return string
     */
    public function getClientId(): string
    {
        return $this->get(OauthAuth0Constants::AUTH0_CLIENT_ID, '');
    }

    /**
     * @api
     *
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->get(OauthAuth0Constants::AUTH0_CLIENT_SECRET, '');
    }

    /**
     * @api
     *
     * @return string
     */
    public function getCustomDomain(): string
    {
        return $this->get(OauthAuth0Constants::AUTH0_CUSTOM_DOMAIN, '');
    }
}
