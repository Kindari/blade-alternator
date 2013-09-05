<?php namespace Kindari\BladeAlternator;

class BladeAlternator { 

        public $counts = array();

        public function increment($key) {

                if ( ! array_key_exists($key, $this->counts) ) $this->reset($key);
                $this->counts[$key]++;
                return $this->counts[$key];
        }

        public function reset($key) {
                $this->counts[$key] = 0;
                return $this;
        }

        public function choose() {

        	$items = func_get_args();
            $index = $this->increment($key = $this->getKey() );
            if ($index == count($items)) $this->reset($key);
            return $items[$index - 1];
        }

        public function getKey() {
            $bt = debug_backtrace();
        	$trace = $bt[1];
        	return "{$trace['file']}@{$trace['line']}";

        }

}