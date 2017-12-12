@php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Schema::table('users', function (Blueprint $table) {
  $table->tinyInteger('gravatar')->default(0);
  $table->tinyInteger('contactable')->default(1);
});

echo 'Migration complete';

@endphp