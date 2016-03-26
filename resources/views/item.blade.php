<a href="/company-details/{{ $company->slug }}" class="company-name">{{ stripslashes($company->name) }}</a>
<p><a href="/category/{{ $company->category->slug }}">{{ $company->category->name }}</a> - <a href="/subcategory/{{ $company->subcategory->slug }}">{{ $company->subcategory->name }}</a></p>
