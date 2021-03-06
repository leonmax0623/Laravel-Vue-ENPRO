<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWireAssemblyInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'AssetInfo.CatalogAssetType.IdentifiedObject.name' => 'required|string',
            'WirePhaseInfo.*.phase_info_id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.insulated' => 'present|boolean',
            'WirePhaseInfo.*.WireInfo.sizeDescription' => 'present|nullable|string',
            'WirePhaseInfo.*.WireInfo.name' => 'present|nullable|string',
            'WirePhaseInfo.*.WireInfo.strandCount' => 'present|integer',
            'WirePhaseInfo.*.WireInfo.coreStrandCount' => 'present|nullable|integer',
            'WirePhaseInfo.*.WireInfo.material_id' => [
                'required',
                'integer',
                'exists:wire_material_kind,id',
            ],
            'WirePhaseInfo.*.WireInfo.coreRadius.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.coreRadius.value' => 'present|nullable|number',
            'WirePhaseInfo.*.WireInfo.radius.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.radius.value' => 'present|nullable|number',
            'WirePhaseInfo.*.WireInfo.insulation_material_id' => [
                'required',
                'integer',
                'exists:transformer_cooling_kind,id',
            ],
            'WirePhaseInfo.*.WireInfo.insulationThickness.id' => 'present|integer',
            'WirePhaseInfo.*.WireInfo.insulationThickness.value' => 'present|nullable|number',
            'WirePhaseInfo.*.WireInfo.ratedCurrent.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.ratedCurrent.value' => 'present|nullable|number',
            'WirePhaseInfo.*.WireInfo.rDC20.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.rDC20.value' => 'present|nullable|number',
            'WirePhaseInfo.*.WireInfo.enproBreakForce.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.enproBreakForce.value' => 'present|nullable|number',
            'WirePhaseInfo.*.WireInfo.enproWeightPerLength.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.enproWeightPerLength.value' => 'present|nullable|number',
            'WirePhaseInfo.*.WireInfo.nominalVoltage.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.nominalVoltage.value' => 'present|nullable|number',
            'WirePhaseInfo.*.WireInfo.standardServiceLife.id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.standardServiceLife.value.years' => 'present|integer',
            'WirePhaseInfo.*.WireInfo.enpro_gost_id' => 'required|integer',
            'WirePhaseInfo.*.WireInfo.OverheadWireInfo.id' => 'present|integer',
            'WirePhaseInfo.*.WireInfo.OverheadWireInfo.value' => 'present|string',
            'WirePhaseInfo.*.WireInfo.CableInfo.construction_kind_id' => [
                'required',
                'integer',
                'exists:cable_construction_kind,id',
            ],
            'WirePhaseInfo.*.WireInfo.CableInfo.fire_safety_id' => [
                'required',
                'integer',
                'exists:enpro_fire_safety_kind,id',
            ],
            'WirePhaseInfo.*.WireInfo.CableInfo.shield_material_id' => [
                'required',
                'integer',
                'exists:cable_shield_material_kind,id',
            ],
            'WirePhaseInfo.*.WireInfo.CableInfo.outer_jacket_kind_id' => [
                'required',
                'integer',
                'exists:cable_outer_jacket_kind,id',
            ],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'AssetInfo.CatalogAssetType.IdentifiedObject.name.required'  => '???????????????? ?????????????????????? ?????? ????????????????????',
            'AssetInfo.CatalogAssetType.IdentifiedObject.name.string'  => '???????????????? ????????????',
            'WirePhaseInfo.*.WireInfo.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.phaseInfo.id.required' => '???????? ???????????????????? ?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.phaseInfo.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.insulated.boolean' => '?????????????????????????? ????????????? ???????????????? true ?????? false',
            'WirePhaseInfo.*.WireInfo.sizeDescription.string' => '?????????????? ????????????????/????????????????????, ????, ????????????',
            'WirePhaseInfo.*.WireInfo.strandCount' => '???????????????????? ???????????????? ?????????????????? ?????????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.coreStrandCount' => '???????????????????? ???????????????? ?? ???????????????? ???????????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.material_id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.material_id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.coreRadius.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.coreRadius.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.coreRadius.value.numeric' => '???????????????? ??????????',
            'WirePhaseInfo.*.WireInfo.radius.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.radius.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.radius.value.numeric' => '???????????????? ??????????',
            'WirePhaseInfo.*.WireInfo.insulation_material_id.required' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.insulation_material_id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.insulationThickness.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.insulationThickness.value.numeric' => '???????????????? ??????????',
            'WirePhaseInfo.*.WireInfo.ratedCurrent.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.ratedCurrent.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.ratedCurrent.value.numeric' => '???????????????? ??????????',
            'WirePhaseInfo.*.WireInfo.rDC20.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.rDC20.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.rDC20.value.numeric' => '???????????????? ??????????',
            'WirePhaseInfo.*.WireInfo.enproBreakForce.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.enproBreakForce.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.enproBreakForce.value.numeric' => '???????????????? ??????????',
            'WirePhaseInfo.*.WireInfo.enproWeightPerLength.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.enproWeightPerLength.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.enproWeightPerLength.value.numeric' => '???????????????? ??????????',
            'WirePhaseInfo.*.WireInfo.nominalVoltage.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.nominalVoltage.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.nominalVoltage.value.numeric' => '???????????????? ??????????',
            'WirePhaseInfo.*.WireInfo.standardServiceLife.id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.standardServiceLife.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.standardServiceLife.value.years.integer' => '???????????????????? ?????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.enpro_gost_id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.enpro_gost_id.integer' => '???? ?????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.OverheadWireInfo.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.OverheadWireInfo.value.string' => '???????????????? ????????????',
            'WirePhaseInfo.*.WireInfo.CableInfo.construction_kind_id.id.required' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.CableInfo.construction_kind_id.id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.CableInfo.fire_safety_id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.CableInfo.fire_safety_id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.CableInfo.shield_material_id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.CableInfo.shield_material_id.integer' => '???????????????? ?????????? ??????????',
            'WirePhaseInfo.*.WireInfo.CableInfo.outer_jacket_kind_id.required' => '?????????????????????? ?????? ????????????????????',
            'WirePhaseInfo.*.WireInfo.CableInfo.outer_jacket_kind_id.integer' => '???????????????? ?????????? ??????????',
        ];
    }
}
