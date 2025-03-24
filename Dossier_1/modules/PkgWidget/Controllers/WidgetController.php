<?php

namespace Modules\PkgWidget\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\PkgWidget\App\Services\WidgetService;
use Exception;  // Import the Exception class

class WidgetController extends Controller
{
    protected $widgetService;

    public function __construct(WidgetService $widgetService)
    {
        $this->widgetService = $widgetService;
    }

    /**
     * Show the test form.
     */
    public function test()
    {
        return view('PkgWidget::test');
    }

    /**
     * Execute the method provided in the form using the service.
     */
    public function execute(Request $request)
    {
        $methodName = $request->input('method_name');

        try {
            // Attempt to dynamically call the method in the service
            $data = $this->widgetService->dynamicCall($methodName);
            return view('PkgWidget::dashboard', $data);
            
        } catch (Exception $e) {
            \Log::error('Error executing method: ' . $e->getMessage());
            return view('PkgWidget::error', ['error' => 'An error occurred while processing your request.']);
        }
    }
}
