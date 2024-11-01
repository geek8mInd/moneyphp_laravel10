<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-md-auto gap-2">
          <li class="nav-item rounded">
              <a class="nav-link {{ Route::is('countrycurrencys.*') ? 'active' : '' }}" aria-current="page" href="{{ route('countrycurrencys.index') }}"><i class="bi bi-globe me-2"></i>Countries & Currencies</a>
          </li>
          <li class="nav-item rounded">
              <a class="nav-link {{ Route::is('calculator.*') ? 'active' : '' }}" href="{{ route('calculator.index') }}"><i class="bi bi-calculator-fill me-2"></i>Calculator</a>
          </li>
          <li class="nav-item rounded">
            <a class="nav-link {{ Route::is('discount.*') ? 'active' : '' }}" href="{{ route('discount.index') }}"><i class="bi bi-gift-fill me-2"></i>Discount</a>
          </li>
          <li class="nav-item rounded">
              <a class="nav-link {{ Route::is('conversion.*') ? 'active' : '' }}" href={{ route('conversion.index') }}><i class="bi bi-cash me-2"></i>Conversion</a>
          </li>
          <li class="nav-item rounded">
              <a class="nav-link {{ Route::is('aggregation.*') ? 'active' : '' }}" href={{ route('aggregation.index') }}><i class="bi bi-bar-chart-fill me-2"></i>Aggregation</a>
          </li>
        </ul>
      </div>
    </div>
</nav>