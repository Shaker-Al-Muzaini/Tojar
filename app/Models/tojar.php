<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed|string $image
 * @property mixed $MerchantName
 * @property mixed $Merchantsphone
 * @property mixed $IdentificationNumber
 * @property mixed $invoiceNumber
 * @property mixed $checkboxs
 * @property mixed $Date
 * @property mixed $crossing
 * @property mixed $Paymentstatus
 * @property mixed $Receiptnumber
 * @property mixed $carNumber
 * @property mixed $ThedriverName
 * @property mixed $DriverID
 * @property mixed $DriverMobileNumber
 *@property mixed $MerchantName2
 * @property mixed $Merchantsphone2
 * @property mixed $invoiceNumber2
 * @property mixed $active
 * @property mixed $IdentificationNumber2
 * @method static where(string $string, $id)
 * @method static latest()
 * @method static get()
 * @method static selection()
 * @method static select(string $string)
 */
class tojar extends Model
{
    protected $table='tojar';
    use HasFactory;
    use SoftDeletes;

}
