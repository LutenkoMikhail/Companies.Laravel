<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\CompanyCollection;
use App\Http\Resources\Api\v1\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\Config;

class CompanyController extends Controller
{

    /**
     * HTTP status code.
     *
     * @var int
     */
    private int $statusCode = 200;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->paginate = Config::get('constants.db.paginate_companies.paginate_company_10');
    }

    /**
     * Empty collection
     *
     * @param $companies
     *
     * @return $companies
     */
    private function isEmptyCollection($companies)
    {
        if ($companies->isEmpty()) {
            $companies = [];
            $this->statusCode = 404;
        }
        return $companies;
    }

    /**
     * Empty array
     *
     * @param $company
     *
     * @return $company
     */
    private function isEmptyArray($company)
    {
        if (!$company) {
            $this->statusCode = 404;
        }
        return $company;
    }

    /**
     * Show a list of companies.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function companies()
    {
        $companies = $this->isEmptyCollection(Company::orderBy('edrpou')->paginate($this->paginate));

        return (new CompanyCollection($companies))->response()->setStatusCode($this->statusCode);
    }


    /**
     *  Show company.
     *
     * @param Company $company
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function company($id)
    {
        $company = $this->isEmptyArray(Company::find($id));

        return (new CompanyResource($company))->response()->setStatusCode($this->statusCode);
    }

    /**
     *  Search company by EDRPOU.
     *
     * @param string $edrpou
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function companySearchEdrpou(string $edrpou)
    {
        $company = $this->isEmptyArray(Company::where('edrpou', '=', $edrpou)->first());

        return (new CompanyResource($company))->response()->setStatusCode($this->statusCode);
    }

    /**
     * Search company by Name
     *
     * @param string $name
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function companySearchName(string $name)
    {
        $companies = $this->isEmptyCollection(Company::where('full_name', 'LIKE', '%' . $name . '%')->paginate($this->paginate));

        return (new CompanyCollection($companies))->response()->setStatusCode($this->statusCode);

    }

}
