<?php 
    namespace Class;

    class Model{
        private $value = [];

        public function __call($name, $args)
        {
            $method =  substr($name, 0, 3);

            $fieldName = substr($name, 3, strlen($name));

            if($method == 'get') return (isset($this->value[$fieldName]) ? $this->value[$fieldName] : null);
            if($method == 'set') $this->value[$fieldName] = $args[0];

        }

        public function setData($data = array())
        {
            foreach ($data as $key => $value) {
                $this->{'set'.$key}($value);
            }
        }

        public function getData()
        {
            return $this->value;
        }
    }
?>