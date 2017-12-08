<?php 
namespace Joesama\Flower\Data\Model;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jf_step';

    /**
     * One to Many relationship with Elesen\Model\Data\Model\Application.
     *
     */
    public function flow()
    {
        return $this->belongsTo(Flow::class,'fk_jf_flow');
    }

}
