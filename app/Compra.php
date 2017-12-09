<?

namespace App;

use App\Workflow\Workflow;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Brexis\LaravelWorkflow\Traits\WorkflowTrait;

class Compra extends Model {

    use Notifiable;
    use WorkflowTrait;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->status = Workflow::$STARTED_STATUS_VALUE;
    }

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