<?php

    namespace App\Traits;

    use Illuminate\Support\Facades\App;

    trait MultiLanguage
    {
        /**
         * @param string $key
         * @return mixed
         */
        public function __get($key)
        {
            if (isset($this->multi_lang) && in_array($key, $this->multi_lang)) {
                $res = $key . '_' . App::getLocale();
                if($this->$res == null) {
                    $res = $key . '_' . App::getFallbackLocale();
                }
                $key = $res;
            }
            return parent::__get($key);
        }
    }
