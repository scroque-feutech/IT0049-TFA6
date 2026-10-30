<?php
return ['default' => env('QUEUE_CONNECTION', 'sync'), 'connections' => ['sync' => ['driver' => 'sync']], 'failed' => ['driver' => 'file', 'path' => storage_path('framework/cache/failed_jobs')]];
