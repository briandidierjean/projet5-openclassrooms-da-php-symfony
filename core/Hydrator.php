<?php
namespace Core;

trait Hydrator
{
    /**
     * Hydrate data
     *
     * @param array $data Data to be hydrated
     *
     * @return void
     */
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $key = str_replace('_', '', $key);

            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
