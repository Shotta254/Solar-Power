<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnGridPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'solar_panel_id',
        'inverter_id',
        'pv_production_meter_id',
        'main_panel_id',
        'electricity_meter_id',
        'description',
        'price',
    ];

    public function solarPanel()
    {
        return $this->belongsTo(InventoryItem::class, 'solar_panel_id');
    }

    public function inverter()
    {
        return $this->belongsTo(InventoryItem::class, 'inverter_id');
    }

    public function pvProductionMeter()
    {
        return $this->belongsTo(InventoryItem::class, 'pv_production_meter_id');
    }

    public function mainPanel()
    {
        return $this->belongsTo(InventoryItem::class, 'main_panel_id');
    }

    public function electricityMeter()
    {
        return $this->belongsTo(InventoryItem::class, 'electricity_meter_id');
    }
}
