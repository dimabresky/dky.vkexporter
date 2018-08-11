<?php

use Bitrix\Main\Localization\Loc;

if (empty(\dki\vkexporter\Tools::checkFields(array("iblock_id" => $request->get("iblock_id"), "app_id" => $request->get("app_id"), "app_secret" => $request->get("app_secret")))) && check_bitrix_sessid()) {

    $options->save(array("iblock_id" => $request->get("iblock_id"), "app_id" => $request->get("app_id"), "app_secret" => $request->get("app_secret")));
    LocalRedirect($APPLICATION->GetCurPageParam("step=2", \dki\vkexporter\Tools::getURLParametersForDel()));
}
?>
<tr>
    <td width="40%"><label><?= Loc::getMessage("dki_VKEXPORTER_APP_ID_FIELD_TITLE")?>:</label></td>
    <td width="60%">
        <input type="text" name="app_id" value="<?= $options->get()->app_id?>">
    </td>
</tr>
<tr>
    <td width="40%"><label><?= Loc::getMessage("dki_VKEXPORTER_APP_SECRET_FIELD_TITLE")?>:</label></td>
    <td width="60%">
        <input type="text" name="app_secret" value="<?= $options->get()->app_secret?>">
    </td>
</tr>
<tr>
    <td width="40%"><label><?= Loc::getMessage("dki_VKEXPORTER_IBLOCK_FIELD_TITLE")?>:</label></td>
    <td width="60%">
        <select name="iblock_id">
            <option value="">...</option>
            <? foreach (\dki\vkexporter\Tools::getAvailIblocks() as $arIblock): ?>
                <option <? if ((int) $arIblock["ID"] === (int) $options->get()->iblock_id): ?>selected=""<? endif ?> value="<?= $arIblock["ID"] ?>"><?= $arIblock["NAME"] ?></option>
            <? endforeach; ?>
        </select>
    </td>
</tr>
<? $o_tab->Buttons();
?>
<input type="submit" name="next" value="<?= Loc::getMessage("dki_VKEXPORTER_NEXT_BTN_TITLE")?>" title="<?= Loc::getMessage("dki_VKEXPORTER_NEXT_BTN_TITLE")?>" class="adm-btn-save">