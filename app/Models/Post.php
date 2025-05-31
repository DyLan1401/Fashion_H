<?Php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'ma_bai_viet';
    protected $fillable = [
        'ma_bai_viet',
        'tieu_de',
        'noi_dung',
        'anh_dai_dien',
        'trang_thai_bai_viet',
        'ma_tac_gia',
        'ngay_tao',
    ];
    public $timestamps = false;
    protected $dates = ['ngay_tao']; // Đảm bảo ngay_tao được chuyển thành Carbon

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->ngay_tao = now(); // Đặt ngay_tao khi tạo mới
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'ma_tac_gia', 'id');
    }
}