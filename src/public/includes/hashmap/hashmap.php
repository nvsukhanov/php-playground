<?php

namespace HashMap;

class HashMap {
    private array $buckets = [];

    public function set(string | int | float | IHashable $key, $value): void {
        $hash = $this->getHash($key);
        $bucket = @$this->buckets[$hash];
        if (!$bucket) {
            $bucket = new \HashMap\Bucket();
            $this->buckets[$hash] = $bucket;
        }
        $bucket->store($key, $value);
    }

    public function get(string | int | float | IHashable $key): mixed {
        $hash = $this->getHash($key);
        $bucket = @$this->buckets[$hash];
        if ($bucket instanceof \HashMap\Bucket) {
            return $bucket->retrieve($key);
        }
        return null;
    }

    public function delete(string | int | float | IHashable $key): void {
        $hash = $this->getHash($key);
        $bucket = $this->buckets[$hash];
        if ($bucket instanceof \HashMap\Bucket) {
            $bucket->delete($key);
        }
    }

    private function getHash(string | int | float | IHashable $key): string {
        if (is_string($key)) {
            return $key;
        } else if (is_int($key) || is_float($key)) {
            return 'num__'.$key;
        } else {
            return $key->getHash();
        }
    }
}