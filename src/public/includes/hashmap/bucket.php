<?php

namespace HashMap;

class Bucket {
    private array $keys = array();

    private array $values = array();

    public function store(mixed $key, mixed $value): void {
        $idx = array_search($key, $this->keys, true);
        if ($idx === false) { // replace old key
            $this->keys[] = $key;
            $this->values[] = $value;
        } else { // new key
            $this->values[$idx] = $value;
        }
    }

    public function retrieve(mixed $key): mixed {
        $idx = array_search($key, $this->keys, true);
        if ($idx === false) {
            return null;
        } else {
            return $this->values[$idx];
        }
    }

    public function delete(mixed $key): void {
        $idx = array_search($key, $this->keys, true);
        if ($idx === false) {
            return;
        }
        array_splice($this->keys, $idx, 1);
        array_splice($this->values, $idx, 1);
    }
}