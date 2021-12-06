<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 flex py-4">
                    <div wire:loading wire:target="random(50)">กำลังสุ่มผู้โชคดี...</div>  
                    @if($win1 == 50)
                        <x-button class="{{ $type == 1 ? 'bg-gray-700 text-white' : 'text-gray-700'  }} mr-2" type="button" wire:click="$set('type', 1)" wire:loading.remove wire:target="$emit('type', 1)">ผู้โชคดี 50 ท่าน มูลค่า 1,000 บาท</x-button>
                    @else
                        <x-button class="{{ $type == 1 ? 'bg-gray-700 text-white' : 'text-gray-700'  }} mr-2" type="button" wire:click="random(50, 1)" wire:loading.remove wire:target="random(50, 1)">สุ่มผู้โชคดี 50 ท่าน มูลค่า 1,000 บาท</x-button>
                    @endif

                    @if($win2 == 50)
                        <x-button class="{{ $type == 2 ? 'bg-gray-700 text-white' : 'text-gray-700'  }}" type="button" wire:click="$set('type', 2)" wire:loading.remove wire:target="$emit(50, 2)">ผู้โชคดี 50 ท่าน มูลค่า 1,500 บาท</x-button>
                    @else
                        <x-button class="{{ $type == 2 ? 'bg-gray-700 text-white' : 'text-gray-700'  }}" type="button" wire:click="random(50, 2)" wire:loading.remove wire:target="random(50, 2)">สุ่มผู้โชคดี 50 ท่าน มูลค่า 1,500 บาท</x-button>
                    @endif
                </div>   
                <div class="px-4 mb-2">
                    <h3>รายการผู้มีสิทธิจับฉลาก</h3>
                    <table class="table-auto border w-full rounded-md">
                        <thead>
                            <tr>
                                <th class="border">ลำดับ</th>
                                <th class="border">ชื่อ - นามสกุล</th>
                                <th class="border">เลขสมาชิก</th>
                                <th class="border">รางวัล</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $key => $row)
                            <tr class="border">
                                <td class="border text-center">{{ $key + 1  }}</td>
                                <td class="px-2 border ">{{ $row->name }}</td>
                                <td class="border text-center">{{ $row->member_no }}</td>
                                <td class="border text-center">
                                    @if($type == 1)
                                        <span class="bg-green-600 text-white px-2 rounded-sm"> 1,000 </span>
                                    @else
                                        <span class="bg-red-600 text-white px-2 rounded-sm"> 1,500 </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $rows->links() }}
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
