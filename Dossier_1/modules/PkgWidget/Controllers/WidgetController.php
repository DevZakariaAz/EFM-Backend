<?php

namespace Modules\PkgWidget\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\PkgWidget\App\Requests\StoreWidgetRequest;
use Modules\PkgWidget\App\Requests\UpdateWidgetRequest;
use Modules\PkgWidget\App\Services\WidgetService;
use Modules\PkgWidget\Models\Widget;

class WidgetController extends Controller
{
    protected $widgetService;

    public function __construct(WidgetService $widgetService)
    {
        $this->widgetService = $widgetService;
    }

    public function index()
    {
        $widgets = $this->widgetService->getWidgets();
        return view('PkgWidget::test', compact('widgets'));
    }

    public function execute(Request $request)
    {
        $method = $request->input('method_name');

        $result = $this->widgetService->executeMethod($method);

        return view('PkgWidget::test', compact('result'));
    }

    public function create()
    {
        return view('PkgWidget::create');
    }

    public function store(StoreWidgetRequest $request)
    {

        $validated = $request->validated();
        $this->widgetService->createWidget($validated);

        return redirect()->route('index');
    }

    public function show(string $id)
    {
        $widget = $this->widgetService->getWidgetById($id);

        return view('PkgWidget::show', compact('widget'));
    }

    public function edit($id)
    {
        $widget = Widget::findOrFail($id);

        return view('PkgWidget::edit', compact('widget'));
    }

    public function update(UpdateWidgetRequest $request, $id)
    {
        $validated = $request->validated();
        $widgets = Widget::findOrFail($id);
        $this->widgetService->updateWidget($widgets, $validated);

        return redirect()->route('index');
    }

    public function destroy(string $id)
    {
        $widget = Widget::findOrFail($id);
        $this->widgetService->deleteWidget($widget);

        return redirect()->route('index');
    }
}
