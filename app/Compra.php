<?

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Brexis\LaravelWorkflow\Traits\WorkflowTrait;

class Compra extends Model {

    use Notifiable;
    use WorkflowTrait;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'status'
    ];

    public static function getAll() {
        return factory(Compra::class, 10)->make();
    }

}

?>