<?php

/*  Copyright 2009-2011 Rafael Gutierrez Martinez
 *  Copyright 2012-2013 Welma WEB MKT LABS, S.L.
 *  Copyright 2014-2016 Where Ideas Simply Come True, S.L.
 *  Copyright 2017 nabu-3 Group
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

namespace providers\nabu\qrcode;

use nabu\core\CNabuEngine;
use nabu\core\interfaces\INabuApplication;

use nabu\render\adapters\CNabuRenderModuleManagerAdapter;

use nabu\render\descriptors\CNabuRenderInterfaceDescriptor;

 /**
  * @author Rafael Gutierrez <rgutierrez@nabu-3.com>
  * @since 0.0.1
  * @version 0.0.1
  * @package \providers\nabu\qrcode
  */
class CNabuQRCodeProviderManager extends CNabuRenderModuleManagerAdapter
{
    /** @var CNabuRenderInterfaceDescriptor QR Code Render descriptor. */
    private $nb_qrcode_render_descriptor = null;

    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct(NABU_QRCODE_VENDOR_KEY, NABU_QRCODE_MODULE_KEY);
    }

    public function enableManager()
    {
        $nb_engine = CNabuEngine::getEngine();

        $this->nb_qrcode_render_descriptor = new CNabuRenderInterfaceDescriptor(
            $this,
            'NabuQRCodeRender',
            'Nabu QR Code Render',
            __NAMESPACE__,
            'CNabuQRCodeRenderInterface',
            array(
                'image/jpeg', 'image/png', 'image/svg+xml'
            )
        );
        $nb_engine->registerProviderInterface($this->nb_qrcode_render_descriptor);

        return true;
    }

    public function registerApplication(INabuApplication $nb_application)
    {
        return $this;
    }
}
