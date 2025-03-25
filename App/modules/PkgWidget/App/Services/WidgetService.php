<?php

namespace Modules\PkgWidget\App\Services;

use Exception;
use Modules\PkgWidget\Models\Apprenant;
use Modules\PkgWidget\Models\Widget;

class WidgetService
{
    public function getNombreApprenant()
    {
        $count = Apprenant::count();
        return [
            'title' => 'Number of Learners',
            'value' => $count
        ];
    }

    public function getApprenantsActifs()
    {
        $activeApprenants = Apprenant::where('is_active', true)->pluck('name')->toArray();
        return [
            'title' => 'Active Learners',
            'list' => $activeApprenants,
            'total' => count($activeApprenants)
        ];
    }

    public function executeMethod($method)
    {
        try {
            if (method_exists($this, $method)) {
                return call_user_func([$this, $method]); 
            } else {
                throw new Exception("Method '$method' not found in WidgetService.");
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()]; 
        }
    }

    public function getWidgets()
    {
        $widgets = Widget::all();
        return $widgets;
    }

    public function getWidgetById($id)
    {
        return Widget::findOrFail($id);
    }

    public function createWidget(array $data)
    {
        $widget = Widget::create([
            'name' => $data['name'],
            'method' => $data['method'],
            'type' => $data['type'],
        ]);

        return $widget;
    }

    public function updateWidget(Widget $widget, array $data)
    {

        $widget->update([
            'name' => $data['name'],
            'method' => $data['method'],
            'type' => $data['type'],
        ]);

        return $widget;
    }

    public function deleteWidget(Widget $widget)
    {
        $widget->delete();
        return true;
    }
}
